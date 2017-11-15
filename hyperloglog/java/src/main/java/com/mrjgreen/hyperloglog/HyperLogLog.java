package com.mrjgreen.hyperloglog;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.zip.CRC32;
import java.lang.*;

public class HyperLogLog {

  private int[] registers;
  private int registerSize;
  private long ONE_SHIFT_63;
  private int registerMask;
  private double alphaValue;

  public HyperLogLog(int pValue){
    this.ONE_SHIFT_63 = 1 << 63;
    this.registerSize = 1 << pValue;
    this.registerMask = this.registerSize - 1;
    this.alphaValue = 0.7213 / (1 + 1.079 / this.registerSize);
    this.registers = new int[this.registerSize];
  }

  private static long hash(String val) {
    try {
      MessageDigest md5 = MessageDigest.getInstance("MD5");

      CRC32 crc = new CRC32();

      md5.update(val.getBytes());
      crc.update(md5.digest());

      return crc.getValue();
    } catch ( NoSuchAlgorithmException nsae ) {
        throw new IllegalStateException( nsae );
    }
  }

  public boolean add(String val){
    return this.addHashedValue(this.hash(val));
  }

  private boolean addHashedValue(long hash)
  {
      hash |= this.ONE_SHIFT_63; /* Make sure the loop terminates. */
      int bit = this.registerSize; /* First bit not used to address the register. */
      int count = 1; /* Initialized to 1 since we count the "00000...1" pattern. */
      while((hash & bit) == 0) {
          count++;
          bit <<= 1;
      }
      /* Update the register if this element produced a longer run of zeroes. */
      int index = (int) (hash & this.registerMask); /* Index a register inside registers. */
      if (this.registers[index] < count) {
          this.registers[index] = count;
          return true;
      }
      return false;
  }

  public long count()
  {
      double estimate = 0;
      int emptyRegisters = 0;

      for (int reg : this.registers) {
        if (reg != 0) {
            estimate += (1.0 / Math.pow(2.0, (double)reg));
        } else {
            emptyRegisters++;
            estimate += 1.0;
        }
      }

      estimate = (1 / estimate) * this.alphaValue * this.registerSize * this.registerSize;

      /* Use the LINEARCOUNTING algorithm for small cardinalities.
       * For larger values HyperLogLog raw approximation is used since linear
       * counting error starts to increase. However HyperLogLog shows a strong
       * positive bias in the range 2.5 * this.registerSize - 72000, so
       * we try to compensate for it.
       */
      if (estimate < this.registerSize * 2.5 && emptyRegisters != 0) {
          estimate = this.registerSize * Math.log(this.registerSize / emptyRegisters);
      }

      return (long) Math.floor(estimate);
  }
}
