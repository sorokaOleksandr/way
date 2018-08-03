#include <iostream.h>
#include <math.h>

int main()
{
    int n, f, i;
    double r(1);
    cout << "Enter n: " << endl;
    cin >> n;
    f = (n % 2) ? 1 : 2;
    for (i = f; i <= n; i += 2)
    r *= i;
    if (n % 2)
    cout << "1*3*...*n = " << r << endl;
    else
    cout << "2*4*...*n = " << r << endl;
    system ("pause");
    return 0;
}
    
