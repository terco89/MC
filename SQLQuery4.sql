USE [master]
GO
/****** Object:  Database [MC DONALDS BD]    Script Date: 11/8/2023 11:10:38 ******/
CREATE DATABASE [MC DONALDS BD]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'MC DONALDS BD', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\MC DONALDS BD.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'MC DONALDS BD_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\MC DONALDS BD_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [MC DONALDS BD] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [MC DONALDS BD].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [MC DONALDS BD] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET ARITHABORT OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [MC DONALDS BD] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [MC DONALDS BD] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET  DISABLE_BROKER 
GO
ALTER DATABASE [MC DONALDS BD] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [MC DONALDS BD] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [MC DONALDS BD] SET  MULTI_USER 
GO
ALTER DATABASE [MC DONALDS BD] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [MC DONALDS BD] SET DB_CHAINING OFF 
GO
ALTER DATABASE [MC DONALDS BD] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [MC DONALDS BD] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [MC DONALDS BD] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [MC DONALDS BD] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [MC DONALDS BD] SET QUERY_STORE = OFF
GO
USE [MC DONALDS BD]
GO
/****** Object:  Table [dbo].[Categorias]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Categorias](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Deliverys]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Deliverys](
	[nombre] [nchar](10) NULL,
	[destino] [nchar](10) NULL,
	[id_pedido] [nchar](10) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Empleados]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Empleados](
	[id] [int] NOT NULL,
	[nombre_completo] [varchar](100) NOT NULL,
	[dni] [int] NOT NULL,
	[salario] [int] NOT NULL,
	[id_rol] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Fila]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Fila](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [nvarchar](50) NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Logistica]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Logistica](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [nvarchar](100) NOT NULL,
	[unidad] [int] NOT NULL,
	[id_proveedor] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Menus]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Menus](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[descripcion] [varchar](500) NULL,
	[disponible] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Pedidos]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Pedidos](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[fecha_pedido] [date] NULL,
	[estado] [bit] NULL,
	[detalle] [varchar](500) NULL,
	[precio] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Productos]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Productos](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[descripcion] [varchar](500) NULL,
	[precio] [int] NULL,
	[disponible] [bit] NULL,
	[id_categoria] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Productos_Menu]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Productos_Menu](
	[id_menu] [int] NOT NULL,
	[id_producto] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Productos_Pedido]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Productos_Pedido](
	[id_pedido] [int] NOT NULL,
	[id_producto] [int] NOT NULL,
	[cantidad] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Proveedores]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Proveedores](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[proveedor] [varchar](200) NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Roles]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Roles](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[rol] [varchar](50) NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tipo_Entregas]    Script Date: 11/8/2023 11:10:38 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tipo_Entregas](
	[id] [int] NOT NULL,
	[tipo] [varchar](100) NOT NULL
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Categorias] ON 
GO
INSERT [dbo].[Categorias] ([id], [nombre]) VALUES (1, N'Hamburguesas')
GO
INSERT [dbo].[Categorias] ([id], [nombre]) VALUES (2, N'Pollo y Acompañantes')
GO
INSERT [dbo].[Categorias] ([id], [nombre]) VALUES (3, N'Postres y Helados')
GO
INSERT [dbo].[Categorias] ([id], [nombre]) VALUES (4, N'Bebidas y Cafés')
GO
INSERT [dbo].[Categorias] ([id], [nombre]) VALUES (5, N'Ensaladas y Más')
GO
SET IDENTITY_INSERT [dbo].[Categorias] OFF
GO
INSERT [dbo].[Empleados] ([id], [nombre_completo], [dni], [salario], [id_rol]) VALUES (1, N'Juan Perez', 12345678, 3000, 1)
GO
INSERT [dbo].[Empleados] ([id], [nombre_completo], [dni], [salario], [id_rol]) VALUES (2, N'Maria Rodriguez', 23456789, 4000, 2)
GO
INSERT [dbo].[Empleados] ([id], [nombre_completo], [dni], [salario], [id_rol]) VALUES (3, N'Carlos Gomez', 34567890, 3500, 1)
GO
INSERT [dbo].[Empleados] ([id], [nombre_completo], [dni], [salario], [id_rol]) VALUES (4, N'Laura Ramirez', 45678901, 4500, 3)
GO
SET IDENTITY_INSERT [dbo].[Menus] ON 
GO
INSERT [dbo].[Menus] ([id], [nombre], [descripcion], [disponible]) VALUES (1, N'Menú Big Mac', N'Incluye un Big Mac, papas fritas medianas y una bebida mediana.', 1)
GO
INSERT [dbo].[Menus] ([id], [nombre], [descripcion], [disponible]) VALUES (2, N'Menú McNuggets', N'Incluye 10 McNuggets, papas fritas medianas y una bebida mediana.', 1)
GO
INSERT [dbo].[Menus] ([id], [nombre], [descripcion], [disponible]) VALUES (3, N'Menú Desayuno', N'Incluye un Egg McMuffin, una porción de Hash Browns y un café.', 1)
GO
INSERT [dbo].[Menus] ([id], [nombre], [descripcion], [disponible]) VALUES (4, N'Happy Meal', N'Incluye una hamburguesa, papas fritas pequeñas, una bebida pequeña y un juguete.', 1)
GO
SET IDENTITY_INSERT [dbo].[Menus] OFF
GO
SET IDENTITY_INSERT [dbo].[Pedidos] ON 
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (1, CAST(N'2023-08-05' AS Date), 0, N'Sin modificaciones', 10000)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (2, CAST(N'2023-08-06' AS Date), 1, N'Sin salsa', 4500)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (3, CAST(N'2023-08-07' AS Date), 0, N'Con extra de queso', 4200)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (4, CAST(N'2023-08-08' AS Date), 1, N'Sin juguete', 11400)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (5, CAST(N'2023-08-09' AS Date), 0, N'Sin modificaciones', 5000)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (6, CAST(N'2023-08-10' AS Date), 1, N'Sin salsa', 9000)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (7, CAST(N'2023-08-11' AS Date), 0, N'Con extra de queso', 4200)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (8, CAST(N'2023-08-12' AS Date), 1, N'Sin juguete', 3800)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (9, CAST(N'2023-08-13' AS Date), 0, N'Sin modificaciones', 10000)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (10, CAST(N'2023-08-14' AS Date), 1, N'Sin salsa', 4500)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (11, CAST(N'2023-08-15' AS Date), 0, N'Con extra de queso', 4200)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (12, CAST(N'2023-08-16' AS Date), 1, N'Sin juguete', 11400)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (13, CAST(N'2023-08-17' AS Date), 0, N'Sin modificaciones', 5000)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (14, CAST(N'2023-08-18' AS Date), 1, N'Sin salsa', 9000)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (15, CAST(N'2023-08-19' AS Date), 0, N'Con extra de queso', 4200)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (16, CAST(N'2023-08-20' AS Date), 1, N'Sin juguete', 3800)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (17, CAST(N'2023-08-21' AS Date), 0, N'Sin modificaciones', 10000)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (18, CAST(N'2023-08-22' AS Date), 1, N'Sin salsa', 4500)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (19, CAST(N'2023-08-23' AS Date), 0, N'Con extra de queso', 4200)
GO
INSERT [dbo].[Pedidos] ([id], [fecha_pedido], [estado], [detalle], [precio]) VALUES (20, CAST(N'2023-08-24' AS Date), 1, N'Sin juguete', 11400)
GO
SET IDENTITY_INSERT [dbo].[Pedidos] OFF
GO
SET IDENTITY_INSERT [dbo].[Productos] ON 
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (1, N'QuesoBurger', N'Hamburguesa sencilla con una capa de queso cheddar derretido.', 2000, 1, 1)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (2, N'Filete de Pescado', N'Filete de pescado empanizado con lechuga y salsa tártara.', 3000, 1, 1)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (3, N'McFlurry Oreo', N'Helado de vainilla suave mezclado con galletas Oreo trituradas.', 2000, 1, 3)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (4, N'Papas Fritas', N'Papas fritas crujientes y saladas.', 1500, 1, 2)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (5, N'Sprite', N'Refrescante bebida de limón-lima.', 2000, 1, 4)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (6, N'Café', N'Café caliente y fresco.', 1500, 1, 4)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (7, N'Ensalada César', N'Lechuga fresca con pollo a la parrilla, queso parmesano y aderezo César.', 3500, 1, 5)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (8, N'Apple Pie', N'Tarta de manzana caliente y crujiente.', 1500, 1, 3)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (9, N'Egg McMuffin', N'Huevo, jamón y queso en un muffin inglés.', 3000, 1, 1)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (10, N'McWrap Pollo', N'Pollo a la parrilla, lechuga, tomate y aderezo ranch envuelto en una tortilla.', 3500, 1, 1)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (11, N'Chicken Deluxe', N'Pechuga de pollo a la parrilla, lechuga, tomate y mayonesa.', 3500, 1, 1)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (12, N'Té Helado', N'Refrescante té helado endulzado.', 2000, 1, 4)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (13, N'McChicken', N'Pollo rebozado, lechuga y mayonesa en un panecillo.', 3000, 1, 1)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (14, N'Conejo de Vainilla', N'Cono de helado de vainilla suave.', 1000, 1, 3)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (15, N'Batido de Chocolate', N'Batido cremoso de chocolate.', 2500, 1, 3)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (16, N'Jugo de Naranja', N'Jugo de naranja recién exprimido.', 2000, 1, 4)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (17, N'Hamburguesa', N'Hamburguesa sencilla con pepinillos, cebolla y ketchup.', 2000, 1, 1)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (18, N'Agua embotellada', N'Agua embotellada fría.', 1500, 1, 4)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (19, N'McNuggets 20 piezas', N'20 piezas de pollo rebozado servidos con tu salsa favorita.', 6000, 1, 2)
GO
INSERT [dbo].[Productos] ([id], [nombre], [descripcion], [precio], [disponible], [id_categoria]) VALUES (20, N'Frappé Mocha', N'Café helado mezclado con chocolate y cubierto con crema batida.', 2500, 1, 3)
GO
SET IDENTITY_INSERT [dbo].[Productos] OFF
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (1, 1)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (1, 5)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (1, 9)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (2, 2)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (2, 5)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (2, 9)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (3, 8)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (3, 13)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (4, 10)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (4, 5)
GO
INSERT [dbo].[Productos_Menu] ([id_menu], [id_producto]) VALUES (4, 16)
GO
SET IDENTITY_INSERT [dbo].[Roles] ON 
GO
INSERT [dbo].[Roles] ([id], [rol]) VALUES (1, N'Cajero')
GO
INSERT [dbo].[Roles] ([id], [rol]) VALUES (2, N'Gerente')
GO
INSERT [dbo].[Roles] ([id], [rol]) VALUES (3, N'Cocinero')
GO
INSERT [dbo].[Roles] ([id], [rol]) VALUES (4, N'Limpiador')
GO
INSERT [dbo].[Roles] ([id], [rol]) VALUES (5, N'Logistica')
GO
INSERT [dbo].[Roles] ([id], [rol]) VALUES (6, N'Repartidor')
GO
SET IDENTITY_INSERT [dbo].[Roles] OFF
GO
USE [master]
GO
ALTER DATABASE [MC DONALDS BD] SET  READ_WRITE 
GO
