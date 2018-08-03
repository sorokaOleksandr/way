#include <iostream.h>
#include <cstring>

int main()
{
    char str[100];
    cout << "Enter a string " << endl;
    cin.getline(str,100);
    char* Lscob = strtok(str,"(");
    char* koma = strtok(str,",");
    
while(Lscob != NULL || koma != NULL)
{    
   if(Lscob != NULL)
   { 
            cout << Lscob << endl;
            Lscob = strtok(NULL,"(");
            //cout << "['(' - op Levaya skobka ]" << endl; 
            }
           


              
              
       if(koma != NULL)
       {
         cout << koma << endl;
         koma = strtok(NULL, ",");
        // cout << "[',' - op koma ]" << endl;
       }
         
         //if(koma!=0)
           // cout << "[',' - op koma ]" << endl; 
         
         
    }                                
system("pause");
return 0;
}
