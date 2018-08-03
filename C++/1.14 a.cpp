#include <iostream.h>
#include <math.h>

int main()
{
    int n, i, k;
    double r = 0, x;
    cout << "Enter n: " << endl;
    cin >> n;
    cout << "Enter x: " << endl;
    cin >> x;
    double sin_st;
    for (i = 1; i <= n; i++)
    {
        sin_st = 1;
        for (k = 1; k <= i; k++)
        sin_st *= sin(x);
          r += sin_st;
        }
        cout << "res: " << r << endl;
        system ("pause");
        return 0;
        }
