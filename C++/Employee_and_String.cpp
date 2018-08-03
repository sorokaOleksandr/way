#include "String.hpp"

class Employee
{
      public:
             Employee();
             Employee(char *, char *, char *, long);
             ~Employee();
             Employee(const Employee &);
             Employee & operator=(const Employee &);
             
             const String & GetFirstName()const { return itsFirstName; }
             const String & GetLastName()const { return itsLastName; }
             const String & GetAddress()const { return itsAddress; }
             long GetSalary()const { return itsSalary; }
             
             void SetFirstName(const String & fName)
              { itsFirstName = fName; }
             void SetLastName(const String & lName)
              { itsLastName = lName; }
             void SetAddress(const String & address)        
              { itsAddress = address; }
             void SetSalary(long salary)
              { itsSalary = salary; }     
              
      private:
              String itsFirstName;
              String itsLastName;
              String itsAddress;
              long itsSalary;
};
      
 Employee::Employee():
  itsFirstName(""),
  itsLastName(""),
  itsAddress(""),
  itsSalary(0)
  {}

 Employee::Employee(char * firstName, char * lastName, char * address, long salary):
  itsFirstName(firstName),
  itsLastName(lastName),
  itsAddress(address),
  itsSalary(salary)
  {}

 Employee::Employee(const Employee & rhs):
  itsFirstName(rhs.GetFirstName()),
  itsLastName(rhs.GetLastName()),
  itsAddress(rhs.GetAddress()),
  itsSalary(rhs.GetSalary())
  {}
  
 Employee::~Employee()
  {}
  
 Employee & Employee::operator=(const Employee & rhs)
 {
          if(this == &rhs)
           return *this;
          
          itsFirstName = rhs.GetFirstName();
          itsLastName = rhs.GetLastName();
          itsAddress = rhs.GetAddress();
          itsSalary = rhs.GetSalary();
          
          return *this;
}

int main()
{
    Employee Edie("Jane","Doe","1461 Shore ParkWay", 20000);
    Edie.SetSalary(50000);
    String LastName("Levine");
    Edie.SetLastName(LastName);
    Edie.SetFirstName("Edythe");
    
    cout << "Zovyt : " << Edie.GetFirstName().GetString() << endl;
    cout << " " << Edie.GetLastName().GetString() << "\n";
    cout << "Adres: " << Edie.GetAddress().GetString() << " \n";
    cout << "Zarplata: " << Edie.GetSalary() << "\n";
    
system("pause");
return 0;
}
    
 

 
 
 
                        
                           
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
