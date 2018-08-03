#include <iostream.h>

int Double(int);
long Double(long);
float Double(float);
double Double(double);

int main()
{
    int myInt = 6500;
    long myLong = 65000;
    float myFloat = 6.5F;
    double myDouble = 6.5e20;
    
    int doubledInt;
    long doubledLong;
    float doubledFloat;
    double doubledDouble;
    
    cout << "my int: " << myInt << "\n";
    cout << "my long: " << myLong << "\n";
    cout << "my float: " << myFloat << "\n";
    cout << "my double: " << myDouble << "\n";
    
    doubledInt = Double(myInt);
    doubledLong = Double(myLong);
    doubledFloat = Double(myFloat);
    doubledDouble = Double(myDouble);
    
    cout << "doubledint: " << doubledInt << "\n";
    cout << "doubledlong: " << doubledLong << "\n";
    cout << "doubledfloat: " << doubledFloat << "\n";
    cout << "doubleddouble: " << doubledDouble << "\n";
    system("pause");
    return 0;
}

int Double(int original)
{
    cout << "In Double(int)\n";
    return 2 * original;
}

long Double(long original)
{
     cout << "In Double(long)\n";
     return 2 * original;
     }
     float Double(float original)
     {
           cout << "In Double(float)\n";
           return 2 * original;
           }
           double Double(double original)
           {
           cout << "In Double(double)\n";
           return 2 * original;
           }
