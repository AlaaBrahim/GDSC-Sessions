#include <stdio.h>
#include <string.h>

void reverse_engineering(char *input)
{
    int len = strlen(input);
    char flag[] = "MJYI{xkbkxyk_ktmotkkxotm_oytz_zngz_kgye_glzkxgrr}";

    for (int i = 0; i < len; i++)
    {
        if (isalpha(input[i]))
        {
            char base = isupper(input[i]) ? 'A' : 'a';
            input[i] = (input[i] - base + 6) % 26 + base;
        }
    }

    if (strcmp(input, flag) == 0)
    {
        printf("Congratulations! You found the flag!\n");
    }
    else
    {
        printf("Sorry, that's not the correct flag. Try again!\n");
    }
}

int main()
{
    char user_input[100];

    printf("Welcome to the Reverse Engineering CTF Challenge!\n");
    printf("Enter the secret flag: ");

    fgets(user_input, sizeof(user_input), stdin);

    user_input[strcspn(user_input, "\n")] = '\0';

    reverse_engineering(user_input);
    printf("Press any key to exit...\n");
    getchar();
    return 0;
}
