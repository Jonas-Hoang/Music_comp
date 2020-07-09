CREATE DATABASE nguoi_dung
USE nguoi_dung
GO
CREATE TABLE tai_khoan(
	id INT IDENTITY(1,1) PRIMARY KEY,
	name NVARCHAR(30),
	pass NVARCHAR(30))
GO
INSERT INTO dbo.tai_khoan  VALUES  (N'admin',N'111')
INSERT INTO dbo.tai_khoan  VALUES  (N'hoang',N'111')     
GO
SELECT * FROM dbo.tai_khoan
CREATE TABLE Album(
	AlbumID INT IDENTITY(1,1),   
	AlbumName VARCHAR(200) NOT NULL ,   
	ImageName VARCHAR(500) NOT NULL 
	CONSTRAINT [PK_Album] PRIMARY KEY CLUSTERED(
	AlbumID ASC
	)
)
INSERT INTO dbo.Album
        (  AlbumName, ImageName )
VALUES  (  -- AlbumID - int
          'MADE', -- AlbumName - varchar(200)
          'bbang.jpg'  -- ImageName - varchar(500)
          )
SELECT * FROM dbo.Album
GO
CREATE TABLE Song(
	SongID INT IDENTITY(1,1),
	SingerName NVARCHAR(50) NOT NULL,
	AlbumName NVARCHAR(50) NOT NULL,
	SongFileName VARCHAR(100) NOT NULL
	CONSTRAINT [PK_Song] PRIMARY KEY CLUSTERED(
	SongID ASC
	)
)
GO
SELECT * FROM dbo.Album
DELETE dbo.Song WHERE SingerName = ''
INSERT INTO dbo.Song ( SingerName, AlbumName ,  SongFileName) VALUES  ( N'' , N'' , ''  )
INSERT dbo.Song
        ( SingerName ,
          AlbumName ,
          SongFileName
        )
VALUES  ( N'Big bang' , -- SingerName - nvarchar(50)
          N'MADE' , -- AlbumName - nvarchar(50)
          'mp3/LastDance.mp3'  -- SongFileName - varchar(100)
        )
		GO
SELECT * FROM dbo.Song
GO
CREATE PROCEDURE Chon_Album @Name NVARCHAR(50) = ''  
AS   
BEGIN   
SELECT AlbumID, AlbumName, ImageName  
FROM dbo.Album   
WHERE AlbumName LIKE @Name +'%'   
ORDER BY AlbumName  
END 
GO
CREATE PROC Them_Album @Name NVARCHAR(50), @Image NVARCHAR(100)
AS
BEGIN
	IF NOT EXISTS (	SELECT * FROM dbo.Album WHERE AlbumName = @Name)
	BEGIN
		INSERT INTO dbo.Album
				( AlbumName, ImageName )
		VALUES  ( @Name, -- AlbumName - varchar(200)
				@Image  -- ImageName - varchar(500)
				)
		SELECT 'Inserted' AS results
	END
	ELSE
	BEGIN
		SELECT 'Exists' AS results	
	END
END	
GO
CREATE PROCEDURE ChonTatCa_Song @AlbumName NVARCHAR(50) = ''     
AS   
BEGIN   
	SELECT SongID,   
	SingerName ,   
	AlbumName ,   
	SongFileName      
	FROM dbo.Song   
	WHERE AlbumName like @AlbumName +'%'     
END 
GO
CREATE PROCEDURE Them_Song  @SingerName NVARCHAR(50) = '',   @AlbumName NVARCHAR(50) = '', @SongFileName VARCHAR(100) = ''     
AS   
BEGIN   
	IF NOT EXISTS (SELECT * FROM dbo.Song WHERE SongFileName=@SongFileName)   
	BEGIN   
		INSERT INTO dbo.Song
				( SingerName ,
				  AlbumName ,
				  SongFileName
				)
		VALUES  ( @SingerName ,@AlbumName ,@SongFileName
				)  
		Select 'Inserted' as results   
	END   
	ELSE   
	BEGIN   
	Select 'Exists' as results   
	END   
  
END    
GO
Create PROCEDURE Xoa_Song                                                
   ( @id VARCHAR(20)     = '' )                                                          
AS                                                                  
BEGIN         
        DELETE FROM dbo.Song WHERE SongID=@id                       
END   
GO
Create PROCEDURE Sua_Song  @ID VARCHAR(10) = '',   @SingerName VARCHAR(50) = '',   @AlbumName VARCHAR(50) = '',   @SongFileName VARCHAR(100) = ''  
AS   
BEGIN   
UPDATE dbo.Song  
SET [SingerName] = @SingerName,  
[AlbumName] = @AlbumName,  
SongFileName = @SongFileName   
WHERE   
SongID = @ID   
Select 'Updated' as results   
END 