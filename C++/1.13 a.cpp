#include <iostream.h>
#include <math.h>


int main()
{
    //system("chcp 1251 >> null");
    setlocale(LC_CTYPE, "Russian");
    int i, n;
    cout << "¬ведите число: ";
    cin >> n;
    double r = n;
    for (int i = 1; i <= n; i++)
        r += 1.0 / (i*i);
    cout << "результат: " << r << endl;
    system ("pause");
    return 0;
}
    
    
