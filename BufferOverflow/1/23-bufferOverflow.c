#include <stdio.h>
#include <string.h>

char* GetOTP(){
    //Code... 
    //Example OPT code return:
    return "1337";
}

/**
 * YesWeHack - Vulnerable Code Snippet
*/

// Run: gcc 23-bufferOverflow.c -fno-stack-protector -o 23-bof
// Then run the program: ./23-bof

// If that do not work, run: `chmod +x 23-bufferOverflow.c`. Then run it again

int LoadDashboard(){}

int main(void)
{
    char *OTP = GetOTP();
    char tryOTP[4];
    int root = 0;

    for ( int tries = 0; tries < 3; tries++ ) {
        printf("Enter OTP (Four digits): ");
        gets(tryOTP);
    
        //Check if the user has root privileges or OPT:
        if ( root || strcmp(tryOTP, OTP) == 0 ) {
            printf("> Success, loading dashboard\n");
            LoadDashboard();
            return 1;
        } else {
            printf ("> Incorrect OTP\n");
        }
        
        if ( tries >= 3 ) {
            return 0;
        }
    }
}
