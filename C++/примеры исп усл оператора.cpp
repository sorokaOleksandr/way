#include <iostream.h>

int main()
{
    int x, y, z;
    cout << "Enter two nambers.\n";
    cout << "First: \n";
    cin >> x;
    cout << "Second: \n";
    cin >> y;
    
    if(x > y)
    z = x;
    else
    z = y;
    cout <<  "z: " << z << " \n";
    
    z = (x > y) ? x : y;
    cout << "z: " << z << " \n";
    system ("pause");
    return 0;
}
