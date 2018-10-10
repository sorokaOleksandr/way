// ������� ������ ���������

/*����� ��������� ����������� �������� m x n, ��� ���� ������������� �� 1 �� n, � ������� - �� 1 �� m.
���������� ���� � ��������� ������ ���� ����� ����� ����. ������� �������, ��������� � �������� �����
����������� ���� ����� (r, c1) � (r, c2), ��� r ������������ ����� ����, c1 - ��������� �������,
c2 - �������� �������.
��� ������ ����� ������ ���������� ������, ��� ����� ��������� ������� ������. ������ ����� ���� ��������
������ � ������, �� ������� ����������� ��������.
��� �������� ����� ��������� � ��� k ���������� ����� ����� � ������� ���������� ������, ��� ��� �����
���������� ������� ������.
��������: ���������� ���� ����� ������������ ���� � ������ � ������ ������ ����.
������� ������:
������ ����� �������� 3 ����� �����, ���������� ���������: n (���������� �����), m (���������� �������),
k (���������� ���������� �����).
������ ��������� ����� i �� ������ ���������� k �������� 3 ����� �����, ���������� ���������: r, c1, c2.
�����������:
1 <= n,m <= 10^9
0 <= k <= 1000
1 <= r <= n
1 <= c1,c2 <= m
�������� ������:
����� �����, ������������ ���������� ������, ��� ����� ���������� ������� ������.
�������� ����:
4 4 3
2 2 3
3 1 4
4 4 4
�������� �����:
9
*/

#include <iostream>
using namespace std;

int main()
{
	const unsigned int MIN = 1;
	const unsigned int MAX = 1000000;
	const unsigned int MIN_WAY = 0;
	const unsigned int MAX_WAY = 1000;
	
	int rowQuantity = 0;     // n  
	int columnQuantity = 0;  // m
	int wayQuantity = 0;     // k
	int b = 1;
	
	int numberRow = 0;  //r
	int startWay = 0;   // c1
	int endWay = 0;     // c2
	
	cout << "Create a city" << endl;
	cout << "Enter the namber Quantity row" << endl;
	cin >> rowQuantity;
    cout << "Enter the namber Quantity column" << endl;
    cin >> columnQuantity;
    cout << "Enter the namber Quantity Way" << endl;
    cin >> wayQuantity;
    
    cout << rowQuantity << " " << columnQuantity << " " << wayQuantity << endl;
 
    int mapCity[rowQuantity][b][columnQuantity];
    
    
    if( ((MIN <= rowQuantity) && (columnQuantity <= MAX) ) && ((MIN_WAY <= wayQuantity) && (wayQuantity <= MAX_WAY)) )
    {
    	

          // ��������� ����� ������� ����������
          for(int i=0; i<rowQuantity; ++i)
          {
            for(int j=0; j<b; ++j)
            {
              for(int k=0; k<columnQuantity; ++k)
              {
                mapCity[i][j][k] = 0;
              }
  
            }
           cout << endl;
          }


          // ������ ����� ������
           for(int i=0; i<rowQuantity; ++i)
           {
             for(int j=0; j<b; ++j)
             {
               for(int k=0; k<columnQuantity; ++k)
               {
                 cout << mapCity[i][j][k];
               }
             }
             cout << endl;
            }   
    	   
	}
	else
	{
		cout << "the entered values are not valid"  << endl;
	}
	
    
    
    // ������������ �����
    cout << "Enter data with a space between the values" << endl;
    cout << "1) Namber row" << endl;
    cout << "2) Start way" << endl;
    cout << "3) End way" << endl;
    
    
    for(int k=0; k<wayQuantity; ++k)
    {	
       cin >> numberRow >> startWay >> endWay ;
       
          
          for(int i=0; i<rowQuantity; ++i)
            {
                for(int j=0; j<b; ++j)
                {
                  for(int k=0; k<columnQuantity; ++k)
                   {
                    if((numberRow-1 == i) && (k >= startWay-1 && k < endWay))
                    {	
                      mapCity[i][j][k] = 1;
                    }
                     else
                    {
                      continue;
                    }
                   }
  
               }
            }
    
	}
	
	     
	
	// ������ ����� ������ � ������ � ��������� ���������� ������ ������ ��� �o�����

  cout << "city map with tram ways" << endl;
  int lamp = 0;


  for(int i=0; i<rowQuantity; ++i)
   {
     for(int j=0; j<b; ++j)
     {
      for(int k=0; k<columnQuantity; ++k)
      {
      	if(mapCity[i][j][k] == 0)
    		{
    			++lamp;
			}
         cout << mapCity[i][j][k];
      }
     }
    cout << endl;
   }
  	cout << "empty place for lamp = " << lamp << endl;

	
	
	return 0;
}














