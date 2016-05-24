/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author jessicazeng1127
 */
//
import java.sql.*;
//import java.io.*;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
//import java.util.logging.Level;
//import java.util.logging.Logger;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


@WebServlet("/productdetail")
public class productdetail extends HttpServlet{
    Connection conn = null;
  
    /**
     *
     * @param config
     * @throws ServletException
     */
    @Override
    public void init(ServletConfig config) throws ServletException {
        super.init(config);
        try{
            Class.forName("com.mysql.jdbc.connection").newInstance();
            conn = DriverManager.getConnection("jdbc:mysql://sylvester-mccoy-v3.ics.uci.edu/inf124grp33","","");
        }catch(Exception e){
            e.printStackTrace();
        }finally{
        }
    }
   @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try{
            processRequest(request,response);
        }catch(SQLException e){
            e.printStackTrace();
        }
    }
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try{
            processRequest(request,response);
        }catch(SQLException e){
            e.printStackTrace();
        }
    }
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, SQLException {
        response.setContentType("text/html;charset=UTF-8");
        Statement  stmt = null;
        PreparedStatement preparedStmt = null;
        ResultSet   rs = null;
        String sql = "";
        try {
            PrintWriter out = response.getWriter();
            /* Including .css file and setting the title */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<link rel=\"stylesheet\" type=\"text/css\" href=\"product_detail.css\" />");
            out.println("<title> Details </title>");            
            out.println("</head>");
            out.println("<body>");
            
            // include our menu bar
            request.getRequestDispatcher("/WEB-INF/menu.html").include(request, response);
                      
            // content
            out.println("<div>");
            out.println("<table class = 'center'>");
            synchronized(sql){
                stmt = conn.createStatement();
                int loop = 1;
                rs = stmt.executeQuery("SELECT* FROM products");
                while(rs.next()){
                    String param_types = request.getParameter("category");
                    String name = rs.getString("name");
                    String pid = rs.getString("product_id");
                    float price = rs.getFloat("price");
                    String category = rs.getString("category");
                    //String full_name = rs.getString("name");
                    if (param_types.equals(category)){
                        if (loop %3 == 1)
                            out.println("<tr>");
                        out.println("<th>");
                        out.println("<div class = 'img'>");
                        //out.println("<a target='_blank' href='/product?pid="+pid+"'>");
                        //out.println("<img src='picture/"+category+"/"+name+"/"+name+"_main.jpg' alt='"+name+"'/>");
                        out.println("<p> $"+price+"</p>");
                        //out.println("<p>"+full_name+"</p>");
                        out.println("</a>");
                        out.println("</div>"); 
                        out.println("</th>");
                        if (loop %3 == 0)
                            out.println("</tr>");
                        loop++;
                    }
                }
            }
            out.println("</table>");
            out.println("</div>");
            
            // include the footer, close body tag, close html
            request.getRequestDispatcher("/WEB-INF/footer.html").include(request, response);
        }catch(Exception e){
            e.printStackTrace();
        }finally{
            if(stmt != null){
                stmt.close();
            }
            if(preparedStmt != null){
                preparedStmt.close();
            }
        }
    }
   @Override
    public void destroy() {
        try{
            conn.close();
        }catch(SQLException e){
            e.printStackTrace();
        }
    }
     
 @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
