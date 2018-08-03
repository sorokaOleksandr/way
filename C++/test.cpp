#include <iostream>
#include <cmath>

using namespace std;

int main()
{
    int n = 0;
    cout << "Vvedite chislo: " << endl;
    cin >> n;
    
    int i = 0;
    double result = 0;
    
    for (i = 0; i < n; ++i)
    {
        result = sqrt(2.0 + result);
    }
    cout << result << endl;
    system("pause");
    return 0;
}
