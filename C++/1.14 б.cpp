#include <iostream.h>
#include <math.h>

int main()
{
    int n, x, i, k;
    double x_st, r;
    cout << "Enter n: " << endl;
    cin >> n;
    cout << "Enter x: " << endl;
    cin >> x;
    
    for (i = 1; i <= n; i++)
    {
        x_st = 1;
        for (k = 1; k <= i; k++)
        x_st *= x;
          r += sin(x_st);
        }
        cout << "res: " << r << endl;
        system ("pause");
        return 0;
        }
