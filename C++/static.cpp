#include <iostream.h>

class Car
{
      public:
             Car( int age ): itsAge(age){ staticCar++; }
             ~Car(){ staticCar--; }
             int GetAge()const { return itsAge; }
             void SetAge(int age){ itsAge = age; }
             static int staticCar;
      private:
              int itsAge;
};

int Car::staticCar = 0;
void Func();

int main()
{
    const int maxCar = 3; int i;
    Car *Garage[maxCar];
    for( i = 0; i < maxCar; i++)
    {
         Garage[i] = new Car(i);
         Func();
         }
    for(i = 0; i < maxCar; i++)
    {
          delete Garage[i];
          Func();
          }
          system("pause");
          return 0;
}
void Func()
{
     cout << Car::staticCar <<" \n";
}
                     
             
             
