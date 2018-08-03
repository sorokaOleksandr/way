#include <iostream.h>

char vec[2][4]={{'a','b','c','d'},
                    {'1','2','3','4'}};

int main()
{
    
    for(int i=0; i<2; i++)
    {
             for(int j=0; j<4; j++)
             {
                 cout << "vec[" << i << "]" "[" << j << "]= " << vec[i][j] << "\n";
             }
    }
    system("pause");
    return 0;
} 
    
      
                                          
