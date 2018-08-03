#include <iostream.h>

class Employee
{
      public:
             Employee(int age, int stag);
             ~Employee();
             
             int GetAge() const {return itsAge;}
             void SetAge(int age){itsAge = age;}
             
             int GetStag() const {return itsStag;}
             void SetStag(int stag) {itsStag = stag;}
             
             void Sled() const { cout << "Sleduushsciy sotrudnic: \n";}
      private:
              int itsAge;
              int itsStag;
};

Employee::Employee(int age, int stag)
{
                       itsAge = age;
                       itsStag = stag;
}
Employee::~Employee()
{
}

int main()
{
           Employee Jonn;
           Jonn.SetAge(25);
           cout << "Vozrast Jonna:\t " << Jonn.GetAge() << " Let.\n";
           Jonn.SetStag(5);
           cout << "Stag robotu Jonna:\t " << Jonn.GetStag() << "Let.\n";
           Jonn.Sled();
           system("pause");
           return 0;
}
