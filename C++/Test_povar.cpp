#include <iostream.h>

int menu();
int menu2();
int func();
void func1();
void func2();

int main()
{
    setlocale(LC_CTYPE, "Russian");
    
    bool exit = false;
    for(;;)
    {
           int choice = menu();
           switch(choice)
           {
                         case (1):
                              func();
                              break;
                         case (2):
                              exit = true;
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
           
           cout << " ***** Тест смогу ли я стать поваром ??? ***** \n\n";
           cout << " Сделайте выбор пожалуйста...\n\n";
           cout << " (1).......... Пройти тест!\n\n";
           cout << " (2).......... Выйти.\n\n";
           cin >> choice;
           return choice;
           }
int func()
{
     int resKart = menu2();
     switch(resKart)
     {
                    case (1):
                         func1();
                         break;
                    case(2):
                            func2();
                            break;
}
}
int menu2()
{
    int resKart;
     cout << "Вы любите чистить картошку?\n\n";
     cout << "(1).... Да\n";
     cout << "(2)....Нет\n";
     cin >> resKart;
     return resKart;
}

void func1()
{
cout << " Pozdravlyau!!! Vi smogete stst6 povarom!!!\n\n\n";
}
void func2()
{
 cout << "Naychites6 chistit6 kartoshky s ydovol6stviem i togda vam bydet schast6e!!!\n\n\n";
}

