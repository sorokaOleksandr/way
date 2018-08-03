#include <iostream.h>

void Kvadrat(int&, int&);
void Kyb(int&, int&);
typedef void(*VPF)(int&, int&);
void PrintVals(VPF, int&, int&);

int main()
{
    int van = 2, two = 4;
    int choice;
    bool fQuit = false;
    
    VPF pFunc;
    
    while(fQuit == false)
    {
                cout << "(0) Quit \n";
                cout << "(1) Kvadrat \n";
                cout << "(2) Kyb \n";
                cin >> choice;
                
        switch(choice)
        {
                      case (1):
                           pFunc = Kvadrat;
                           break;
                      case (2):
                           pFunc = Kyb;
                           break;
                      default:
                              fQuit = true;
        }
        if(fQuit == true)
         break;
        
        PrintVals(pFunc, van, two);
    }
        system("pause");
        return 0;
}



void PrintVals(VPF pFunc, int &x, int &y)
{
     cout << "X: " << x << "Y: " << y << endl;
     pFunc(x, y);
     cout << "X: " << x << "Y: " << y << endl;
}

void Kvadrat(int &rX, int &rY)
{
     rX *= rX;
     rY *= rY;
}

void Kyb(int &rX, int &rY)
{
     int temp;
     
     temp = rX;
     rX *= rX;
     rX = rX * temp;
     
     temp = rY;
     rY *= rY;
     rY = rY * temp;
}
     
     
     
     
                           
                           
