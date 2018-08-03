#include "EMPLOYEE.hpp"


Employee::Employee(int initialAge, int initialYearsOfservise, int initialSalary)
{
itsAge = initialAge;
itsYearsOfservise = initialYearsOfservise;
itsSalary = initialSalary;
}
Employee::~Employee()
{
}

int main()

{
    Employee Jonn;
    Employee Jessika;
    Jonn.SetAge(25);
    Jonn.SetYearsOfservise(3);
    Jonn.SetSalary(4000);
    Jonn.Sled();
    Jessika.SetAge(20);
    Jessika.SetYearsOfservise(2);
    Jessika.SetSalary(2000); 
    cout << "Informacia po sotrudnikan predpriatia: \n";
    cout << "Vozrast Jonna:\t " << Jonn.GetAge() << " let.\n";
    cout << "Stag robotu Jonna:\t " << Jonn.GetYearsOfservise() << "let.\n";
    cout << "Zarplata Jonna:\t " << Jonn.GetSalary() << "Dolarov SHA.\n";
    cout << "Vozrast Jessici:\t " << Jessika.GetAge() << "let.\n";
    cout << "Stag robotu Jessici:\t " << Jessika.GetYearsOfservise() << "let.\n";
    cout << "Zarplata Jessici:\t " << Jessika.GetSalary() << "Dolarov SHA.\n";
    system("pause");
    return 0;
}
    
    
