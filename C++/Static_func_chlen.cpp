#include <iostream.h>


class Car
{
      public:
             Car():itsAge(1) {}
             virtual ~Car() {}
             virtual void Move()const = 0;
             virtual void Stop()const = 0;
      protected:
                int itsAge;
};

class Lada : public Car
{
      public: 
             void Move()const { cout << "Lada start \n"; }
             void Stop()const { cout << "Lada stop \n"; }
};

class Pego : public Car
{
      public:
             void Move()const { cout << "Pego start \n"; }
             void Stop()const { cout << "Pego stop \n"; }
};

class Mers : public Car
{
      public:
             void Move()const { cout << "Mers start \n"; }
             void Stop()const { cout << "Mers stop \n"; }
};

int main()
{
    void(Car::*pFunc)()const=0;
    Car *ptr = 0;
    int VibMash;
    int Method;
    bool fQuit = false;
    
    while(fQuit == false)
    {
                cout << "Enter the namber Car: \n";
                cout << "(0) Quit \n";
                cout << "(1) Lada \n";
                cout << "(2) Pego \n";
                cout << "(3) Mers \n";
                cin >> VibMash;
     switch(VibMash)
     {
                    case(1):
                            ptr = new Lada;
                             break;
                    case(2):
                            ptr = new Pego;
                             break;
                    case(3):
                            ptr = new Mers;
                             break;
                    default:
                            fQuit = true;
                             break;
     }
     if(fQuit)
       break;
       
       cout << "Vibor Metoda: \n";
       cout << "(1) START \n";
       cout << "(2) STOP  \n";
       cin >> Method;
       switch(Method)
       {
                     case(1):
                             pFunc = Car::Move;
                             break;
                     default:
                             pFunc = Car::Stop;
                             break;
       }
       (ptr->*pFunc)();
       delete ptr;
}
system("pause");
return 0;
}
