#include <iostream.h>

void myFunc ();

int main()
{
    int x = 5;
    cout << "res: " << x << endl;
    
    myFunc();
    
    cout << "konechniy res: " << x << endl;
    system("pause");
    return 0;
}

void myFunc ()
{
     int x = 8;
     cout << "myfyncVan: " << x << endl;
     {
     int x = 9;
     cout << "myfuncTwo: " << x << endl;
     }
}

     
