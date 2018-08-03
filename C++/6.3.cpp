#include <iostream.h>

class Cat
{
      public:
             Cat(int initialAge);
             ~Cat();
             int GetAge();
             void SetAge(int age);
             void Meow();
      private:
              int itsAge;
              };
              Cat::Cat(int initialAge)
              {
                                  itsAge = initialAge;
                                  }
                                  Cat::~Cat()
                                  {
                                             }
             int Cat::GetAge()
              {
                  return itsAge;
                  }
                  void Cat::SetAge(int age)
                  {
                       itsAge = age;
                       }
                       void Cat::Meow()
                       {
                            cout << "Meow.\n";
                            }
                            
                            int main()
                            {
                                Cat Frisky(5);
                                Frisky.Meow();
                                cout << Frisky.GetAge() << "\n";
                                Frisky.SetAge(7);
                                cout <<  Frisky.GetAge() << "\n";
                                Frisky.Meow();
                                system("pause");
                                return 0;
                                }
                         
