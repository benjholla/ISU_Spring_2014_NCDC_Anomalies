The answer should look something like the code below and should compile.  However it's not likely they will get anything too close to this.  So grade based on what they figure out.

	#include <stdio.h>
	
	  int main(){
		char str[14] = "Good morning!";
		char sub1[27] = "perntgvqszmwajldbicxfkhuoy";
		char sub2[27] = "gjnecidqlsmwzxpvahbfkortuy";
		int i, j;
		//finding strlen without a statically linked function
		for(i = 0, j = 0; i < 400; i++){
			if(str[i] != '\0'){
				j++;
			}
			else{
				break;
			}
		}
		int strlength = j;
		//Convert to lowercase
		for(i = 0; i < strlength; i++){
			if(str[i] < 'Z' && str[i] >= 'A'){
				str[i] = str[i] - 'A' + 'a';
			}
		}
		for(i = 0, j= 0; i <  strlength && j < strlength; i++, j++){
			if(str[i] < 'z' && str[i] >= 'a'){
				if(j %2 == 0){ //If even
					str[i] = sub1[str[i] -'a'];
				}
				else{
					str[i] = sub2[str[i]-'a'];
				}
			}
			else{
				j--;
			}
		}
		return 0;	
	  }
