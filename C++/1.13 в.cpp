#include <iostream.h>
#include <math.h>

int main()
{
    int i, n;
    double r = 1, sum_cos, sum_sin;
    cin >> n;
    for (i =1; i <= n; i++)
    {
        sum_cos = 0;
        sum_sin = 0;
        for (int j = 1; j <= i; j++)
        {
            sum_cos += cos(j);
            sum_sin += sin(j);
            }
            r *= (sum_cos / sum_sin);
            }
            cout << "res: " << r << endl;
            system ("pause");
            return 0;
            }
    
