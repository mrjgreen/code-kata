package com.mrjgreen.hyperloglog;

// import static org.hamcrest.Matchers.equalTo;
// import static org.hamcrest.Matchers.is;
import static org.junit.Assert.*;

import org.junit.Test;

public class HyperLogLogTest {

	@Test
	public void shouldReturnTrueWhenAcceptingANewValue() {

		HyperLogLog hll = new HyperLogLog(14);

		boolean result = hll.add("some string value");

		assertEquals(true, result);
	}

	@Test
	public void shouldReturnFalseWhenAcceptingAnExistingNewValue() {

		HyperLogLog hll = new HyperLogLog(14);

		hll.add("some string value");
		boolean result = hll.add("some string value");

		assertEquals(false, result);
	}

	@Test
	public void shouldReturnACardinalityEstimateForValues() {

		HyperLogLog hll = new HyperLogLog(14);

		hll.add("value 1");
		hll.add("value 2");
		hll.add("value 3");
		hll.add("value 4");
		long result = hll.count();

		assertEquals(4, result);
	}
}
