#include <iostream.h>

int main()
{
const int  buf[5][9]={{1,1,1,1,1,1,1,1,1},
                      {2,2,2,2,2,2,2,2,2},
                      {3,3,3,3,3,3,3,3,3},
                      {4,4,4,4,4,4,4,4,4},
                      {5,5,5,5,5,5,5,5,5}};
                           
for(int i=4; i>=0; i--)
{
        cout << "i = " << i << "\n";
        
        for(int j=0; j<9; j++)
        {
                cout << " J = " << buf[i][j] << "\n";
        }
}

for(int i=0; i<5; i++)
{
        cout << "i = " << i << "\n";
        
        for(int j=0; j<9; j++)
        {
                cout << " J = " << buf[i][j] << "\n";
        }
}

system("pause");
return 0;
}
