#include <iostream.h>
#include <math.h>

int main()
{
    int i, n;
    double r = 0;
    cin >> n;
    for(i = 1; i <= n; i++)
    r = sqrt(r + 2);
    cout << "res: " << r << endl;
    system("pause");
    return 0;
}
