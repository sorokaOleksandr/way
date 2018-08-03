#include <iostream.h>


int main()
{
    char bufer[] = "aiuradfsdddfklldfdddffferee";
    char *pb1 = bufer;
    char *pb2 = bufer;
    pb2++;
    
    while(*pb1 != 0 && *pb2 != 0)
    {
               if ( *pb1 == *pb2 )
               {
                 cout << *pb1 << endl;
                 pb1+=2;
                 pb2+=2;
               }
               else
               {
                  cout << *pb1 << *pb2 << endl;
                  pb1+=2;
                  pb2+=2;
               }
}         
cout << *pb1 << endl;
  
system("pause");
return 0;
}

     
