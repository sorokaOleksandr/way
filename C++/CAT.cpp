#include "CAT.hpp"

Cat::Cat(int initialAge)
{
itsAge = initialAge;
}
Cat::~Cat()
{
}
int main()
{
    Cat Frisky(5);
    Frisky.Meow();
    cout << Frisky.GetAge() << "\n";
    Frisky.Meow();
    Frisky.SetAge(10);
    cout << Frisky.GetAge() << "\n";
    
    system("pause");
    return 0;
}                               
