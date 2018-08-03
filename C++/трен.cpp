#include <iostream.h>
#include <math.h>

double Par(double, int);

int main()
{
    int van, two;
    cout << "Enter the two parameters! \n";
    cout << "Enter van: ";
    cin >> van;
    cout << "\n";
    cout << "Enter two: ";
    cin >> two;
    cout << "\n";
    
    double resylt;
    
    resylt = Par(van, two);
       
    cout << "Resyltat: " << resylt << "\n";
    system("pause");
    return 0;
}
double Par(double van, int two)
{
       if(two <= 0)
       {
        cout << "Neverniy vvod!\n";
        return -1;
        }
       else
        return van / two;
}
