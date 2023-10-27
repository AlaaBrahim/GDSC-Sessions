#include <stdio.h>
#include <string.h>

char *flag = "GDSC{this_is_a_flag}";
char input[100];

int main()
{
    printf("Enter the flag: ");
    scanf("%99s", input);
    if (strcmp(input, flag) == 0)
        printf("Correct!\n");
    else
        printf("Wrong!\n");
    return 0;
}
