#include <iostream.h>

int main()
{

    setlocale(LC_CTYPE, "Russian");
    cout << "int = " << sizeof(int) << "байт.\n";
    cout << "float = " << sizeof(float) << "байт.\n";
    cout << "char = " << sizeof(char) << "байт.\n";
    cout << "double = " << sizeof(double) << "байт.\n";
    system("pause");
    return 0;
}
