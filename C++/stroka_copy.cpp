#include <iostream.h>
#include <cstring>

int main()
{
    char str[]="Roditel(X,Y) :- Rebenok[x]";
    cout << "\n";
    cout << "***___lEXICAL____ANALIZATOR ******___PROLOG___*******" << endl;           //(),[] 
    //cin.getline(str,100);
    cout << str << "\n\n";
    char* kvPscob = strtok(str,"]");
    char* kvLscob = strtok(str,"[");
    char* Pscob = strtok(str,")");
    char* Lscob = strtok(str,"(");
    char* koma = strtok(str,",");
    
while(Lscob != NULL || koma != NULL)
{    
  if(Lscob != NULL)
   {
         cout << Lscob << endl;
         Lscob = strtok(NULL,"(");
         cout << "['(' - operator Levaya kruglaya skobka ]" << endl;
   }
       
    if(koma != NULL)
     {
         cout << koma << endl;
         koma = strtok(NULL, ",");
         cout << "[',' - operator: koma ]" << endl;
     }
            
         
   if(Pscob != NULL)
   {
         cout << Pscob << endl;
         Pscob = strtok(NULL,"(");
         cout << "[')' - operator: Pravaya kruglaya skobka ]" << endl;
   }
   
   
   
     if(kvLscob != NULL)
     {
         cout << kvLscob << endl;
         kvLscob = strtok(NULL,"(");
         cout << "['[' - operator: kvadratnaya Levaya skobka ]" << endl;
     }
         
     
       
     if(kvPscob != NULL)
     {
         cout << kvPscob << endl;
         kvPscob = strtok(NULL,"]");
         cout << "[']' - operator: kvadratnaya Pravaya skobka ]" << endl;
     }
     
         
  cout << "\n\n\n";        
  cout << "Avtor: __________________ Soroka Oleksander ___________________" <<endl; 
  cout << "\n\n";    
}                    
system("pause");
return 0;
}
