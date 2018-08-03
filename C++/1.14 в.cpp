#include <iostream.h>
#include <math.h>

int main()
{
    int i, k, n, x;
    double sin_d, r;
    cout << "Enter n: " << endl;
    cin >> n;
    cout << "Enter x: " << endl;
    cin >> x;
    for (i = 1; i <= n; i++)
    {
        sin_d = x;
        for (k = 1; k <= i; k++)
        sin_d = sin(sin_d);
        r += sin_d;
        }
        cout << "res: " << r << endl;
        system ("pause");
        return 0;
        }
