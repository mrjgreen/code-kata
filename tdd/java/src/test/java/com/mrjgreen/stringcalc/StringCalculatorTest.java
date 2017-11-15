package com.mrjgreen.stringcalc;

import static org.junit.Assert.*;

import org.junit.Test;

public class StringCalculatorTest {

	@Test
	public void shouldCalculateLenghtOfASingleString() {

		StringCalculator stringcalc = new StringCalculator();

		int result = stringcalc.calculate("something");

		assertEquals(9, result);
	}

	@Test
	public void shouldCalculateLenghtOfAMultipleStrings() {

		StringCalculator stringcalc = new StringCalculator();

		int result = stringcalc.calculate("something", "else");

		assertEquals(13, result);
	}
}
