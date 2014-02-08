#include <stdio.h>
#include <string.h>

/*
This is a program that you could potential use to solve the Suspicious Message anomaly.  You would change the two strings with what characters you figured out until the message was totally decoded.
*/
int main(){
	char str[800] = "znjs, uxwd bnfvx il e toaqlcu swzjp un keaer-haet alplr'k llde.  w jedo uxl blfk ph niqwcl, nkplskwqvv ph hhre nr mv cfraorpnf trhglcu.  xprhvx, onwceqoux, psx mprwer hwvn il eanfsx, ifp w brnb env hq uxlm prl hwvnwrz un mn pvhsm hwpj hjeuodoa hl lh.  w bwnv qrwsm pjo keaer-haet, djnb kt wi fhk berp un jedo p apru!  \nwr exlwpwnr, w berp un jedo p dfrtrwdl iwruxxev apruf ina onwceqoux.  w brnb djo bwnv nndo uxl dfrtrwdl (eiplr kxl zlpk ndoa pjo kxhce ni chkadl).  ildwlld, wp'k ilor phn nnrz kwrcl hl xpl twcjp erl xrwsed ws uxl niqwcl!  w bwnv tnkp p dwzr-kt djolp hs mnhzno xntd ina env uxl qhnx erl uxls w'vn zlp unmouxlr p pleg ph llchrppl pjo rwmxu ilqhrl.  xlr qwapjlpf wd hs paawn 2, dh dpcl pjo xeuo.  \naorol xpsknr";
	char sub1[27] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	char sub2[27] = "abcdefghijklmnopqrstuvwxyz";
	int i, j;
	int strlength = strlen(str);
	//Convert to lowercase
	for(i = 0; i < strlength; i++){
		if(str[i] <= 'Z' && str[i] >= 'A'){
			str[i] = str[i] - 'A' + 'a';
		}
	}
	for(i = 0, j= 0; i <  strlength && j < strlength; i++, j++){
		if(str[i] <= 'z' && str[i] >= 'a'){
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

	printf("%s\n", str);
	return 0;
}
