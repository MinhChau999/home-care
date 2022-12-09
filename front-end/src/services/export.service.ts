import exportFromJSON from "export-from-json";

class excelParser {
  exportDataFromJSON(data: any, newFileName: any, fileExportType: string) {
    if (!data) return;
    try {
      const fileName = newFileName || "exported-data";
      const exportType = (exportFromJSON.types as any)[
        fileExportType || "json"
      ];
      exportFromJSON({ data, fileName, exportType });
    } catch (e) {
      throw new Error("Parsing failed!");
    }
  }
}

export default new excelParser();
