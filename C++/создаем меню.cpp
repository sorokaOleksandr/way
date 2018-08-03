#include <iostream.h>

int menu();
void DoTaskOne();
void DoTaskMany(int);

int main()
{
    bool exit = false;
    for(;;)
    {
           int choice = menu();
           switch(choice)
           {
                         case(1):
                                 DoTaskOne();
                                 break;
                         case(2):
                                 DoTaskMany(2);
                                 break;
                         case(3):
                                 DoTaskMany(3);
                                 break;
                         case(4):
                                 continue;
                                 break;
                         case(5):
                                 exit = true;
                                 break;
                         default:
                                 cout << "Nepravelniy vvod!!!\n";
                                 break;
                                 }
           if(exit)
              break;
}
system("pause");
return 0;
}

int menu()
{
    int choice;
    
    cout << "*****Menu*****\n";
    cout << "(1) Choice one.\n";
    cout << "(2) Choice two.\n";
    cout << "(3) Choice three.\n";
    cout << "(4) Vozvrat v menu.\n";
    cout << "(5) Vihod.\n";
         cout << " : ";
         cin >> choice;
         return choice;
}

void DoTaskOne()
{
     cout << "Vibor 1!\n";
}
void DoTaskMany(int which)
{
     if(which == 2)
        cout << "Vibor 2!\n";
     else
        cout << "Vibor 3!\n";
}                                                
                                 
