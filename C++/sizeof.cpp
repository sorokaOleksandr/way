#include <iostream.h>

int main()
{

    setlocale(LC_CTYPE, "Russian");
    cout << "int = " << sizeof(int) << "����.\n";
    cout << "float = " << sizeof(float) << "����.\n";
    cout << "char = " << sizeof(char) << "����.\n";
    cout << "double = " << sizeof(double) << "����.\n";
    system("pause");
    return 0;
}
