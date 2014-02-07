

public class PinCodeGenerator {

	public static void main(String[] args) {

		int numValidCodes = 0;
		
		// PIN Codes are 4 digits ranging from 0000 to 9999
		for(int i=0; i<=9999; i++){
			// For security reasons they do not allow any 4 digit codes that match years between (inclusive) 1900 and 2020
			if(i>=1900 && i<=2020){
				continue;
			}
			
			String num = String.format("%04d", i);
			int firstDigit = Integer.parseInt("" + num.charAt(0));
			int secondDigit = Integer.parseInt("" + num.charAt(0));
			int thirdDigit = Integer.parseInt("" + num.charAt(0));
			int fourthDigit = Integer.parseInt("" + num.charAt(0));
			
			// The first digit cannot be a 3, 5, or 7
			if(firstDigit == 3 || firstDigit == 5 || firstDigit == 7){
				continue;
			}
			
			// The last digit is a sort of parity check, it must be the sum of the first 3 digits modulus 3
			if(fourthDigit != ((firstDigit + secondDigit + thirdDigit) % 3)){
				continue;
			}
			
			// this is a valid PIN code
			numValidCodes++;
			System.out.println(num);
		}
		
		System.out.println("Num Valid Codes: " + numValidCodes);
		

	}

}
