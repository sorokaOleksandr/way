#include <iostream.h>


    const int Yanvar[]= {1,2,3,4,5,6,7,8,9,10,11,
                         12,13,14,15,16,17,18,19,
                         20,21,22,23,24,25,26,27,
                         28,29,30,31};
    const int Fevral[]= {1,2,3,4,5,6,7,8,9,10,11,
                         12,13,14,15,16,17,18,19,
                         20,21,22,23,24,25,26,27,
                         28,29,30,30};
                      
int main()
{
    setlocale(LC_CTYPE, "Russian");
    cout << "январь : " "\n";
    for(int i=0; i<31; i++ )
    {
            if(Yanvar[i]%7)
               cout << Yanvar[i] << endl;
            else               
               cout << Yanvar[i] << "\n\n";
    }
    
     cout << "‘евраль : " "\n";
    for(int i=0; i<30; i++ )
    {
            if(Fevral[i]%7)
               cout << Fevral[i] << endl;
            else               
               cout << Fevral[i] << "\n\n";
    }
system("pause");
return 0;   
}
    
    
    
    
