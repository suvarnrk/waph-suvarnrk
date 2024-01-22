#include <stdio.h>
int main(){
	const char *htmlContent = "<!DOCTYPE html> <html> <head> <title> "
	"Web Application Programming and Hacking </title> </head> <body> "
	"<h1> student: Ruthvik Suvarnakanti </h1> <p> This is done as a part of LAB assignment 1 using CGI Web Application with C"
	"</p> </body> </html>";

	printf("content-type: text/html\n\n");
	printf("/%s", htmlContent);
	return 0;
}
