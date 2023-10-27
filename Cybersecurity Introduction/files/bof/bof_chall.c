#include <stdio.h>

char input[10];
int a = 0;

int main()
{
    printf("What's your name? : ");
    gets(input);
    if (a != 0)
        printf("You win!\n");
    return 0;
}
