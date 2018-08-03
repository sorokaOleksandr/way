#include <iostream.h>

class Cat
{
      public:
             Cat(int age):itsAge(age){ HowManyCats++; }
             ~Cat(){ HowManyCats--; }
             virtual int GetAge() { return itsAge; }
             virtual void SetAge(int age){ itsAge = age; }
             static int HowManyCats;
      private:
              int itsAge;
};

int Cat::HowManyCats = 0;

int main()
{
    const int MaxCat = 5;
    int i;
    Cat *CatHause[MaxCat];
     for(i = 0; i < MaxCat; i++)
     CatHause[i] = new Cat(i);
     
    for(i = 0; i < MaxCat; i++)
    {
          cout << "Kolichestvo kotov:" << Cat::HowManyCats << "\n\n";
          cout << " Vozrast Kotov:" << CatHause[i]->GetAge() << "\n\n";
          delete CatHause[i];
          CatHause[i]=0;
          }
          system("pause");
          return 0;
} 
