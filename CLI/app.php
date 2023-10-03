<?php
// https://github.com/athede-v/4R
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

// Function to clear the console screen
void clearScreen() {
    system("clear");
}

// Function to set the 8-char password
void setPassword(char *password) {
    char input[10];
    while (1) {
        printf("$4R >> Enter Your 8-Char Password (Type 'exit' for Cancel): ");
        scanf("%s", input);

        if (strcmp(input, "exit") == 0) {
            printf("$4R >> Password not set.\n");
            break;
        } else if (strlen(input) != 8) {
            printf("$4R >> WRONG! Password must be 8 characters long.\n");
        } else {
            strcpy(password, input);
            printf("$4R >> Password Set.\n");
            break;
        }
    }
}

// Function to run the 4R Sign In Way
void runSignIn(const char *password) {
    int isIn = 0;
    if (password[0] == '\0') {
        printf("$4R >> Please Set Password First (Type 'set pass').\n");
        return;
    }

    while (!isIn) {
        int randomIndexes[4];
        for (int i = 0; i < 4; i++) {
            randomIndexes[i] = rand() % 8 + 1;
        }

        clearScreen();
        printf("\n\n    X-X-X-X\n");
        printf("    %d-%d-%d-%d\n\n", randomIndexes[0], randomIndexes[1], randomIndexes[2], randomIndexes[3]);

        char passwordCom[9];
        for (int i = 0; i < 4; i++) {
            passwordCom[i] = password[randomIndexes[i] - 1];
        }
        passwordCom[4] = '\0';

        char tempCom[9];
        for (int i = 0; i < 4; i++) {
            printf("    X[%d] : ", randomIndexes[i]);
            scanf("%s", tempCom + i);
        }

        if (strcmp(tempCom, passwordCom) == 0) {
            printf("\n$4R >> Good Job, You're In!\n");
            isIn = 1;
        } else {
            printf("\n$4R >> WRONG! Try Again.\n");
        }
    }
}

int main() {
    srand(time(NULL));

    char password[9] = "";
    int isExit = 0;

    while (!isExit) {
        clearScreen();
        printf("$UR >>> ");
        char input[10];
        scanf("%s", input);

        if (strcmp(input, "exit") == 0) {
            isExit = 1;
        } else if (strcmp(input, "set") == 0) {
            setPassword(password);
        } else if (strcmp(input, "run") == 0) {
            runSignIn(password);
        } else {
            printf("$4R >> Unknown Command\n");
        }
    }

    printf("Goodbye!\n");
    return 0;
}

//    Hello And Welcome To 4R Sing In Way :) 
//    This The Way How it Works 
//    You Can Be More Creative (I Mean You Can Change Code And Add It Some Protect Protocol To It And Make A Strong And Very Safe 4R)
   
//      X-X-X-X
//      1-5-8-1
   
//    This Is Template Of The CLI So At First Enter Your 8-Char Password By 
//     `$UR >>> set pass`
//    Command , Type In The Console And Press Enter
   
//    And Then You Can Test 4R Sign In Way BY
//     `$UR >>> run`
//    Command , Just Type In The Console And Press Enter Bro 
   
//    -Some Options Are Active At The Moment For More Security (You Can Remove And Replace Your Code Or Change Any Thing You Want , It Just A Very Simple Code)
   
//    Type `exit` To Exit 
//    So Have Fun :) (@athede-v)
