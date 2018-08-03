#include <iostream.h>

int main()
{
    int Var;
    int &rVar = Var;
    int *pVar = &rVar;
    *pVar = 6;    
    cout << "Var: " << Var << "\n";
    cout << "*pVar: " << *pVar << "\n";
    cout << "&rVar: " << rVar << "\n";
    
 system("pause");
 return 0;   
}
