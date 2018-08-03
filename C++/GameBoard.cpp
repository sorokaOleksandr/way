#include <iostream.h>

int main()
{
    int GameBoard[3][3] = {{0,0,0},
                           {0,0,0},
                           {0,0,0}};
    
    for(int i = 0; i < 3; i++)
       for(int j = 0; j < 3; j++)
       {
          cout << "GameBoard :[" << i << "] [" << j << "]: ";
          cout << GameBoard[i][j] << endl;
       }
system("pause");
return 0;
}
