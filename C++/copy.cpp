#include <iostream.h>
#include <cstring>

int main()
{
    char str[100];
    cout << "Enter a string " << endl;
    cin.getline(str,100);
    char* koma;
    koma = strtok(str,",");
    
    while(koma!=NULL )
    {
                       
         cout << koma << endl;
         koma = strtok(",", ",");
         
         if(koma!=0)
            cout << "[',' - op koma ]" << endl; 
         
         
    }                                
system("pause");
return 0;
}
