#include <iostream.h>

int Func(int chislo, int stepen);

int main()
{
    int chislo = 0, res;
    int stepen = 0;
    cout << "Vvedite chislo bolshe 0: ";
    cin >> chislo;
    cout << "\n";
    
    cout << " Vvedide stepen chisla: ";
    cin >> stepen;
    cout << "\n";
    
    res = Func(chislo, stepen);
    
    cout << "I togo resyltat: " << res << endl;
    system("pause");
    return 0;
}
int Func(int chislo, int stepen)
{
    if(stepen == 1)
    {
     return chislo;
     }
    else
     return(chislo * Func(chislo,stepen -1));
}
