#include <iostream.h>

int main()
{
    setlocale(LC_CTYPE,"Russian");
    char bykva[] = "qwertyuiopasdfghjklzxcvbnm";
    char *pb = bykva;
    while(*pb != 0)
    {
         cout << "Ëטעונאכ: " << *pb << " צוכמו = " << int(*pb) << "  \tפכמאע = " << float(*pb) <<" \n";
         pb++;
    }
    
    
    system("pause");
    return 0;
}
