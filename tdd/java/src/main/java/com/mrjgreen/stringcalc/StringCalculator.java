package com.mrjgreen.stringcalc;

public class StringCalculator {
  public int calculate(String... strs){
    int len = 0;
    for (String str : strs) {
      len += str.length();
    }
    return len;
  }
}
