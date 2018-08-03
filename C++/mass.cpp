#include <iostream.h>

int main()
{
     int GameBoard[3][3]= {{1,2,3},{4,5,6},{7,8,9}};
     for(int i = 0; i < 3; i++ )
        for(int j = 0; j < 3; j++)
 {
       cout << "GameBoard[" << i << "][" << j << "]: "<< GameBoard[i][j] << endl;
       }
       system("pause");
       return 0;
}
 
